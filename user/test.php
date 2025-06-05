<?php
// Function to safely get user IP (with fallback)
function getUserIP() {
    $ip = 'Unknown';
    $sources = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
    
    foreach ($sources as $source) {
        if (!empty($_SERVER[$source])) {
            $ip = filter_var($_SERVER[$source], FILTER_VALIDATE_IP) ? $_SERVER[$source] : 'Invalid IP';
            break;
        }
    }
    return $ip;
}

// Function to get device/browser info (silent on failure)
function getDeviceInfo() {
    try {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
        $device = 'Unknown Device';
        $browser = 'Unknown Browser';

        // Device detection
        if (preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $userAgent)) {
            $device = 'Mobile';
        } elseif (preg_match('/Windows/i', $userAgent)) {
            $device = 'Windows PC';
        } elseif (preg_match('/Macintosh|Mac OS X/i', $userAgent)) {
            $device = 'Mac';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            $device = 'Linux PC';
        }

        // Browser detection
        if (preg_match('/Chrome/i', $userAgent)) {
            $browser = 'Chrome';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            $browser = 'Firefox';
        } elseif (preg_match('/Safari/i', $userAgent)) {
            $browser = 'Safari';
        } elseif (preg_match('/Edge/i', $userAgent)) {
            $browser = 'Edge';
        }

        return "$device ($browser)";
    } catch (Exception $e) {
        // Log error silently (e.g., to a file or database)
        error_log("Device detection failed: " . $e->getMessage());
        return "Unknown Device";
    }
}

// Function to get location (fails gracefully)
function getLocation($ip) {
    if ($ip === 'Unknown' || $ip === 'Invalid IP') {
        return ['error' => 'IP not available'];
    }

    try {
        $apiUrl = "http://ip-api.com/json/{$ip}?fields=status,country,regionName,city,isp";
        $response = @file_get_contents($apiUrl); // Suppress warnings
        
        if ($response === FALSE) {
            return ['error' => 'Location service offline'];
        }

        $data = json_decode($response, true);
        
        if ($data['status'] === 'success') {
            return [
                'country' => $data['country'] ?? 'N/A',
                'region' => $data['regionName'] ?? 'N/A',
                'city' => $data['city'] ?? 'N/A',
                'isp' => $data['isp'] ?? 'N/A'
            ];
        } else {
            return ['error' => 'Location not found'];
        }
    } catch (Exception $e) {
        error_log("Location API error: " . $e->getMessage());
        return ['error' => 'Service error'];
    }
}

// Main execution (safe display)
$userIP = getUserIP();
$deviceInfo = getDeviceInfo();
$location = getLocation($userIP);

// Store data in session (silently skip if unavailable)
$_SESSION['login_metadata'] = [
    'ip' => $userIP,
    'device' => $deviceInfo,
    'location' => $location
];

// Display user-friendly output (no errors)
function displaySafe($label, $value) {
    echo "<p><strong>{$label}:</strong> " . htmlspecialchars($value) . "</p>";
}

displaySafe("IP Address", $userIP);
displaySafe("Device", $deviceInfo);

if (isset($location['error'])) {
    displaySafe("Location", $location['error']); // Shows friendly message
} else {
    displaySafe("Location", "{$location['city']}, {$location['region']}, {$location['country']}");
    displaySafe("ISP", $location['isp']);
}
?>
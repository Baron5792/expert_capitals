<style>
    #popup-container {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 11px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: none;
    }

    .popup {
        opacity: 0;
        transition: opacity 0.5s, transform 0.5s;
        transform: translateY(100%);
    }

    .popup.show {
        opacity: 1;
        transform: translateY(0);
    }

    @media screen and (max-width: 767px) {
        #popup-container {
            position: fixed;
            bottom: 90px;
            left: 90px;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 11px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }
    }
</style>

<div id="popup-container"></div>

<script>
    async function fetchRandomName() {
        try {
            const response = await fetch('random-name.php');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            return data.name;
        } catch (error) {
            console.error('Error fetching random name:', error);
            return null;
        }
    }

    function createPopup(name) {
        const container = document.getElementById('popup-container');
        container.style.display = 'block';
        const popup = document.createElement('div');
        popup.className = 'popup';
        popup.innerText = `${name} just invested`;

        container.appendChild(popup);

        setTimeout(() => {
            popup.classList.add('show');
        }, 100);

        setTimeout(() => {
            popup.classList.remove('show');
            setTimeout(() => {
                container.removeChild(popup);
                if (container.children.length === 0) {
                    container.style.display = 'none';
                }
            }, 500);
        }, 10000);
    }

    async function startPopups() {
        while (true) {
            if (!navigator.onLine) {
                console.log('No internet connection. Skipping popup.');
                await new Promise(resolve => setTimeout(resolve, 30000)); // Wait 20 seconds before checking again
                continue;
            }

            const name = await fetchRandomName();
            if (name) {
                createPopup(name);
            }
            await new Promise(resolve => setTimeout(resolve, 30000)); // Wait 20 seconds before the next popup
        }
    }

    startPopups();
</script>
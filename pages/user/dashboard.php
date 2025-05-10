<?php
session_start();

include('../../config.php');
include('includes/header.php');

?>

    <div class="dashboard">
        <div class="sidebar">
            <div class="profile">
            <!-- <img src="get_profile_image.php" alt="User Profile" class="profile-img" id="profile-img"> -->

                <h3 class="username" id="display-name">Loading...</h3>
                <!-- <p id="bio">Bio goes here</p> -->
                <button class="btn edit-btn">Edit Profile</button>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Activity</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="/Capstone/auth/log_out.php">Logout</a></li>
                
            </ul>
        </div>
        <div class="main-content">
            <h2>Dashboard</h2>
            
            <!-- Items Section -->
            <h3>Jobs available</h3>
            <div class="items-container" id="items-container">
                <!-- Items will be loaded here by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Fetch user data from the PHP backend
        fetch('get_user_data.php')
            .then(response => response.json())
            .then(data => {
                // Update the HTML elements with the fetched data
                document.getElementById('display-name').textContent = data.display_name;
                document.getElementById('bio').textContent = data.bio;

                if (data.profile_picture) {
                    document.getElementById('profile-img').src = data.profile_picture;
                }
            })
            .catch(error => {
                console.error('Error fetching user data:', error);
            });

        // Static items to buy (No database integration yet)
        const items = [
            { id: 1, name: 'Job 1', price: '$20', description: 'This is Job 1 to do.', image: 'item1.jpg' },
            { id: 2, name: 'Job 2', price: '$35', description: 'This is Job 2 to do..', image: 'item2.jpg' },
            { id: 3, name: 'Job 3', price: '$50', description: 'This is Job 3 to do..', image: 'item3.jpg' }
        ];

        // Function to display items on the dashboard
        const displayItems = () => {
            const container = document.getElementById('items-container');
            items.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('item');

                itemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}" class="item-img">
                    <h4 class="item-name">${item.name}</h4>
                    <p class="item-description">${item.description}</p>
                    <p class="item-price">${item.price}</p>
                    <button class="btn buy-btn" onclick="buyItem(${item.id})">Earn</button>
                `;

                container.appendChild(itemDiv);
            });
        };

        // Call the function to display items
        displayItems();

        // Example function for buying an item
        function buyItem(itemId) {
            alert('You bought item with ID: ' + itemId);
            // You can extend this with actual purchasing functionality
        }
   
</body>
</html>

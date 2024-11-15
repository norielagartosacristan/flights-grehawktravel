


<footer>
    <div class="footer-container">
        <!-- Left Column: Links -->
        <div class="footer-column">
            <h3>Important Links</h3>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Cookies Policy</a></li>
                <li><a href="#">Terms & Condition</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <!-- Center Column: Social Media Icons -->
        <div class="footer-column social-media">
            <div id="newsletter" class="container mt-5 mb-5">
            <h2>Subscribe to our Newsletter</h2>
                <form action="includes/subscribe.inc.php" method="POST">
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com/greyhawktravelandtours"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="https://youtube.com/@greyhawktravelandtours?si=Ysg5Yx-V5aPeawcJ"><i class="fab fa-youtube"></i></a>
        </div>

        <!-- Right Column: Contact Info -->
        <div class="footer-column">
            <h3>Contact Info</h3>
            <p>Greyhawk Travel and Tours</p>
            <p>Email: info@greyhawktravel.com</p>
            <p>Phone: +63 9705902154</p>
            <p>Address: Godofredo Reyes Sr., Ragay, Camarines Sur</p>
        </div>
    </div>
</footer>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Greyhawk Travel and Tours | All rights reserved.</p>
</footer>

<script>
    document.getElementById("flight-form").addEventListener("submit", async function (e) {
        e.preventDefault();
        
        const origin = document.getElementById("origin").value;
        const destination = document.getElementById("depart").value;
        const departureDate = document.getElementById("departure-date").value;
        const returnDate = document.getElementById("return-date").value || undefined;
        const adults = document.getElementById("adults").value;
        const children = document.getElementById("children").value;
        const infants = document.getElementById("infants").value;
        const travelClass = document.getElementById("cabin").value;
        const directFlights = document.getElementById("directFlights").checked;
        
        // Authorization (you might already have a token saved for your session)
        const token = await getAuthToken();

        // Constructing the query
        let query = `https://api.amadeus.com/v2/shopping/flight-offers?originLocationCode=${origin}&destinationLocationCode=${destination}&departureDate=${departureDate}&adults=${adults}&travelClass=${travelClass}`;
        
        if (returnDate) query += `&returnDate=${returnDate}`;
        if (children > 0) query += `&children=${children}`;
        if (infants > 0) query += `&infants=${infants}`;
        if (directFlights) query += `&nonStop=true`;

        try {
            const response = await fetch(query, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            });
            
            if (response.ok) {
                const data = await response.json();
                displayResults(data);
            } else {
                alert("Error: " + response.status + " - " + response.statusText);
            }
        } catch (error) {
            console.error("Error:", error);
        }
    });

    // Function to get an auth token from Amadeus
    async function getAuthToken() {
        const authResponse = await fetch("https://api.amadeus.com/v1/security/oauth2/token", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `grant_type=client_credentials&client_id=rb0D0wW8YnLbc64TknQGbsu8Y8vgj04D&client_secret=AVbRkRKkAWGowDf6`
        });

        const authData = await authResponse.json();
        return authData.access_token;
    }

    // Function to display the results
    function displayResults(data) {
        const resultsContainer = document.createElement("div");
        resultsContainer.className = "results";
        resultsContainer.innerHTML = "<h3>Flight Search Results</h3>";
        
        data.data.forEach(offer => {
            const offerElement = document.createElement("div");
            offerElement.className = "offer";
            
            const segments = offer.itineraries.map(itinerary => {
                return itinerary.segments.map(segment => `
                    <p><strong>Flight:</strong> ${segment.carrierCode} ${segment.number}</p>
                    <p><strong>From:</strong> ${segment.departure.iataCode} at ${segment.departure.at}</p>
                    <p><strong>To:</strong> ${segment.arrival.iataCode} at ${segment.arrival.at}</p>
                `).join("");
            }).join("<hr>");

            offerElement.innerHTML = `
                <div><strong>Price:</strong> ${offer.price.total} ${offer.price.currency}</div>
                ${segments}
                <hr>
            `;
            resultsContainer.appendChild(offerElement);
        });
        
        document.body.appendChild(resultsContainer);
    }
</script>


</body>
</html>
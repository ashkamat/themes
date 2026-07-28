import logo from '/assets/images/NJA-logo-header.webp';
import logoIcon from '/assets/images/nja-white-icon.png';
import payPalBtn from '/assets/images/btn_donate_74x21.png';

// Header Component
class MainHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <header>
         <div id="mainLogoDiv">
            <a href="index.html">
                <img src="${logo}" alt="NJA Logo">
            </a>
        </div>

          
              <button id="prideModeButton">Pride Mode</button>

               
                       
                         

              

            <nav>
                <i class="ri-close-line"></i>
                <i class="ri-menu-line"></i>
                <ul class="nav-menu">
                    <li><a href="/index.html">Home</a></li>
                    <li><a href="/about.html">About</a></li>
                     <li><a href="/impact.html">Impact</a></li>
                    <li><a href="/projects.html">Projects</a></li>
                    <li><a href="/opportunities.html">Opportunities</a></li>
                    <li><a href="/get-involved.html">Get Involved</a></li>
                </ul>
               
            </nav>


            


                        <a class="ctaBtnGlobal ctaDonate" href="donate.html">Donate</a>

            <!-- Curved border SVG -->
            <svg viewBox="0 0 300 300">
                <path class="headerCurvedBorder" d="M300,0H0V300C0,134.314,134.315,0,300,0Z" />
            </svg>
        </header>
        `;
    }
}

// Footer Component
class MainFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <footer>
            <div class="footerLinks">
                <div class="footerCol">
                    <div id="footerLogo">
                        <a href="/index.html">
                            <img src="${logoIcon}" alt="NJA Logo">
                        </a>
                    </div>
                    <p>Norwood Junk Action</p>
                    
                    
     


                </div>

                <div class="footerCol">
                    <h5>Main Links</h5>
                    <nav>
                        <ul class="nav-menu">
                       <li><a href="/index.html">Home</a></li>
                            <li><a href="/about.html">About</a></li>
                            <li><a href="/projects.html">Projects</a></li>
                            <li><a href="/opportunities.html">Opportunities</a></li>
                            <li><a href="/get-involved.html">Get Involved</a></li>
                            <li><a href="/contact.html">Contact</a></li>
                            <li><a href="/privacy">Privacy Policy</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="footerCol">
                    <h5>Sponsors</h5>
                    <nav>
                        <ul class="nav-menu">
                            <li><a href="https://stanleyarts.org/" target="_blank">Stanley Arts</a></li>
                            <li><a href="https://www.tnlcommunityfund.org.uk/" target="_blank">Community Fund</a></li>
                            <li><a href="https://cvalive.org.uk/" target="_blank">CVA</a></li>
                            <li><a href="https://www.culturecroydon.com/" target="_blank">This is Croydon</a></li>
                            <li><a href="https://www.croydon.gov.uk/" target="_blank">Croydon Council</a></li>
                            <li><a href="https://welovese25.com/" target="_blank">We Love SE25</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="footerCol">
                    <div>
                        <a href="https://www.instagram.com/norwoodjunkaction/" target="_blank" rel="noopener noreferrer"><i class="ri-instagram-line" style="font-size: 30px;"></i>
                        
                        </a>
                        <a href="https://www.facebook.com/NorwoodJunkAction/" target="_blank" rel="noopener noreferrer"><i class="ri-facebook-fill" style="font-size: 30px;"></i></a>


                        <a href="donate.html" target="_self" rel="noopener noreferrer">
                        <img src="${payPalBtn}">
                        </a>
                       
                       

                      



                    </div>
                </div>
            </div>

            <div class="footerCredits">
                © Copyright Norwood Junk Action 2025 | <a style="margin-left:.25rem" href="http://webfresh.co">WebFresh</a>
            </div>
        </footer>
        `;
    }
}

// Define Custom Elements
customElements.define('main-header', MainHeader);
customElements.define('main-footer', MainFooter);



// mobile menu links

document.addEventListener('DOMContentLoaded', function() {
    // Data for the menu items (array of objects)
    const menuItems = [
      { url: "/index.html", text: "Home" },
      { url: "/about.html", text: "About" },
      { url: "/impact.html", text: "Impact" },
      { url: "/projects.html", text: "Projects" },
      { url: "/opportunities.html", text: "Opportunities" },
      { url: "/get-involved.html", text: "Get Involved" },
      { url: "/contact.html", text: "Contact" }
    ];
  
    // Get the target container
    const mobileMenuOverlay = document.querySelector(".mobileMenuOverLay");
  
    // Check if the container exists
    if (mobileMenuOverlay === null) {
      console.error("Mobile menu overlay element not found!");
      return; // Exit the function if the target doesn't exist
    }
  
  
    // Create the <ul> element
    const ul = document.createElement("ul");
  
    // Loop through the menu items data
    menuItems.forEach(item => {
      // Create the <li> element
      const li = document.createElement("li");
  
      // Create the <a> element
      const a = document.createElement("a");
      a.href = item.url;
      a.textContent = item.text;
  
      // Append the <a> to the <li>
      li.appendChild(a);
  
      // Append the <li> to the <ul>
      ul.appendChild(li);
    });
  
    // Append the <ul> to the mobileMenuOverLay container
    mobileMenuOverlay.appendChild(ul);
  
  
      //OPTIONAL: Clear any existing content inside the mobileMenuOverLay before appending
      //This prevents duplication if the script runs more than once.
      //mobileMenuOverlay.innerHTML = ''; //Clear Existing Content 
      //mobileMenuOverlay.appendChild(ul);
  
  
  });




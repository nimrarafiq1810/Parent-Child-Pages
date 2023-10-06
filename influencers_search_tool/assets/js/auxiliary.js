
const loading_card = `<!-- Card Item Loader -->
    <div class="IG-tool-profile-card loader-card">
        <div class="IG-tool-profile-head">
            <i class="animation-loader"></i>
            <h6 class="animation-loader title"></h6>
            <small class="animation-loader title"></small>
        </div>
        <div class="IG-tool-profile-body">
            <ul>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
            </ul>
            <ol>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
            </ol>
        </div>
        <div class="IG-tool-profile-foot">
            <ul>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
                <li class="animation-loader"></li>
            </ul>
        </div>
    </div>
`;

const getCookie = (name) => {
    const cookieName = `${name}=`;
    const cookies = document.cookie.split(';');
    
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        
        if (cookie.startsWith(cookieName)) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    
    return null; // Return null if the cookie is not found
};
  
  // Set a cookie with a specific name, value, and expiration date
const setCookie = (name, value, days) => {
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + days);
    
    const cookieValue = `${name}=${value}; expires=${expirationDate.toUTCString()}; path=/`;
    
    document.cookie = cookieValue;
};
  
  
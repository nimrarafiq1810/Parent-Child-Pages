const new_loader_card = `<!-- skelton Loader -->
<div class="w-full md:w-1/2 lg:w-1/3 p-[15px]">
    <div class="w-full bg-[#F7F8F9] h-full bg-opacity-[0.6] border border-[#ebebeb] rounded-[8px] p-[15px] relative">
        <label for="item1" class="animation-loader custom-checkbox w-[20px] h-[20px] rounded-[6px] absolute right-[20px] top-[30px] bg-white cursor-pointer flex items-center justify-center"></label>
        <div class="flex flex-col">
            <div class="w-[84px] h-[84px] mx-auto rounded-full overflow-hidden animation-loader"></div>
            <h4 class="flex flex-col text-[20px] inter font-[500] text-center animation-loader w-[100px] h-[20px] rounded-[5px] mx-auto my-[10px]"></h4>
            <h4 class="flex flex-col text-[20px] inter font-[500] text-center animation-loader w-[70px] h-[10px] rounded-[5px] mx-auto"></h4>
        </div>

        <ul class="flex justify-center items-center gap-[10px] md:gap-[5px] text-[14px] font-[300] inter text-[#0E2E4D] mt-[30px] mb-[20px] overflow-hidden">
            <li> <a href="#" class="flex items-center gap-[10px]"> <div class="w-[20px] h-[20px] animation-loader rounded-[5px]"></div> <div class="w-[60px] h-[10px] animation-loader rounded-[5px]"></div>  </a> </li>
            <li> <a href="#" class="flex items-center gap-[10px]"> <div class="w-[20px] h-[20px] animation-loader rounded-[5px]"></div> <div class="w-[60px] h-[10px] animation-loader rounded-[5px]"></div>  </a> </li>
            <li> <a href="#" class="flex items-center gap-[10px]"> <div class="w-[20px] h-[20px] animation-loader rounded-[5px]"></div> <div class="w-[60px] h-[10px] animation-loader rounded-[5px]"></div>  </a> </li>
        </ul>

        <div class="flex flex-wrap mx-[-8px]">
            <div class="w-1/3 p-[8px]">
                <div class="w-full h-[75px] animation-loader rounded-[8px]"></div>
            </div>
            <div class="w-1/3 p-[8px]">
                <div class="w-full h-[75px] animation-loader rounded-[8px]"></div>
            </div>
            <div class="w-1/3 p-[8px]">
                <div class="w-full h-[75px] animation-loader rounded-[8px]"></div>
            </div>

            <div class="w-full p-[8px]">
                <div class="w-full h-[75px] animation-loader rounded-[8px]"></div>
            </div>

            <div class="w-full items-start flex gap-[10px] mt-[22px] px-[10px]">
                <div class="w-full h-[30px] animation-loader rounded-full"></div>
                <div class="w-full h-[30px] animation-loader rounded-full"></div>
                <div class="w-full h-[30px] animation-loader rounded-full"></div>
                <div class="w-full h-[30px] animation-loader rounded-full"></div>
            </div>
        </div>
    </div>
</div>
<!-- skelton Loader end -->`;


// const loading_card = `<!-- Card Item Loader -->
//     <div class="IG-tool-profile-card loader-card">
//         <div class="IG-tool-profile-head">
//             <i class="animation-loader"></i>
//             <h6 class="animation-loader title"></h6>
//             <small class="animation-loader title"></small>
//         </div>
//         <div class="IG-tool-profile-body">
//             <ul>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//             </ul>
//             <ol>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//             </ol>
//         </div>

//         <div class="IG-tool-profile-foot">
//             <ul>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//                 <li class="animation-loader"></li>
//             </ul>
//         </div>
//     </div>
// `;
const out_of_searches_message = `<h5>You are out of your free searches. <a href="https://influencers.club/signup/" class="text-blue-500 underline " >Start a free trial now.</a></h5>`;

const getCookie = (name) => {
  const cookieName = `${name}=`;
  const cookies = document.cookie.split(";");

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

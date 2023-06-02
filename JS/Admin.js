console.log("ok");
let setting = document.querySelector(".setting");
let dashboard = document.querySelector(".Dashboard");
let section=document.querySelector(".container1");
setting.onclick = () => {
    section.classList.toggle("show");
    dashboard.classList.toggle("hidden");
}

/*************/

let inputUpload = document.getElementById("userPhoto");
let  image = document.querySelector(".photo");
if (inputUpload) {
    const imageSrc = image.getAttribute("src");
    inputUpload.onchange = () => {
        let reader = new FileReader();
        if (inputUpload.files[0]) {
            reader.readAsDataURL(inputUpload.files[0]);
        }
         else {
            image.setAttribute("src", imageSrc);
            image.classList.remove("show");
        }
        reader.onload = () => {
            image.setAttribute("src", reader.result);
            image.classList.add("show");
        };
    };
}
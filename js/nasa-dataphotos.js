// async function fetchText() {
//     let response = await fetch('https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=DEMO_KEY');

//     console.log(response.status); // 200

//     if (response.status === 200) {
//         let data = await response.json();
//         // handle data
//         console.log(data.photos)
//         let xmlhttp = new XMLHttpRequest();

//         xmlhttp.onreadystatechange = function() {
//             if(this.readyState == 4 && this.status == 200) {
//                 console.log(this.response)
//             } else if (this.readyState == 4) {
//                 console.log("error")
//             }
//         }
//         xmlhttp.open("POST", "profil.php", true);
        
//         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
//         xmlhttp.send("test");
//     }
// }
// fetchText();



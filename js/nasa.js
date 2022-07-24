let pics = document.querySelector(".pics")

async function fetchText() {
    let response = await fetch('https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=DEMO_KEY');

    console.log(response.status); // 200

    if (response.status === 200) {
        let data = await response.json();
        // handle data
        console.log(data.photos)
        Object.entries(data.photos).forEach(entry => {
            const [key, value] = entry;
            console.log(value.img_src);
            // create new li element
            let li = document.createElement('li');
            li.innerHTML = '<img src="'+ value.img_src +'">' + '<button class=".myButtons btn-color" data-id="'+ value.id + '" data-url="'+ value.img_src +'">J\'AIME</button>';
            
            // add it to the ul element
            pics.appendChild(li);
            
          });
        let myButtons = document.querySelectorAll("button");
        myButtons.forEach(element => console.log("test"));
        myButtons.forEach(element => console.log(element.dataset.id));
        myButtons.forEach(item => {

            item.addEventListener('click', event => {

                console.log(item.dataset.id)
                console.log(item.dataset.url)
                console.log("clicked");
                let xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        console.log(this.response)
                    } else if (this.readyState == 4) {
                        console.log("error")
                    }
                }
                xmlhttp.open("POST", "liked.php", true);
                
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xmlhttp.send(item.dataset.id);

            })
          })
    }
}

fetchText();



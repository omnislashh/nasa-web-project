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
            li.innerHTML = '<img src="'+ value.img_src +'">' + '<form><input value="'+ value.id +'" /><input type="submit" value="J\'aime"/></form>';
            
            // add it to the ul element
            pics.appendChild(li);
            
          });
    }
}

fetchText();
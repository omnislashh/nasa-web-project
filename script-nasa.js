let myArray = []

fetch('https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=DEMO_KEY') 
    .then(response => response.json())
    .then(data => console.log(data.photos)) 
    .then((data) => {
        return data;
      })
      .catch(error => console.warn(error));
myArray = data.photos
for(i=0;i<myArray.length;i++) {
    console.log('test')
}


    



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!--############## Bootstrap CDN ######################-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Dogs API</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <main>
      <div class="container jumbotron">
        <header>
          <h1>The Dog Breed Viewer</h1>
          <select class="breeds form-control">
            <option>select a dog breed</option>
          </select>
        </header>
      </div>
      <div class="img-container">
        <div class="container">
          <div class="spinner">
            🐶
          </div>
          <center><img
            src="http://placecorgi.com/260/180"
            class="dog-img show"
            alt="friendly and intimate - man's best friend"
          /></center>
        </div>
      </div>
    </main>
    <script src="./app.js"></script>


 <script>
// https://dog.ceo/api/breeds/list/all
const BREEDS_URL = 'https://dog.ceo/api/breeds/list/all';

const select = document.querySelector('.breeds');

fetch(BREEDS_URL)
  .then(res => {
    return res.json();
  })
  .then(data => {
    const breedsObject = data.message;
    const breedsArray = Object.keys(breedsObject);
    for (let i = 0; i < breedsArray.length; i++) {
      const option = document.createElement('option');
      option.value = breedsArray[i];
      option.innerText = breedsArray[i];
      select.appendChild(option);
    }
    console.log(breedsArray);
  });

select.addEventListener('change', e => {
  let url = `https://dog.ceo/api/breed/${e.target.value}/images/random`;
  getDoggo(url);
});

const img = document.querySelector('.dog-img');
const spinner = document.querySelector('.spinner');

const getDoggo = url => {
  spinner.classList.add('show');
  img.classList.remove('show');
  fetch(url)
    .then(res => {
      return res.json();
    })
    .then(data => {
      img.src = data.message;
    });
};
img.addEventListener('load', () => {
  spinner.classList.remove('show');
  img.classList.add('show');
});
</script>
</body>
</html>
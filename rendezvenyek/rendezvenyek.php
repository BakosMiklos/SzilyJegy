<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRendezvenyek.css">
    <title>Rendezveny</title>
</head>
<body>
<div class="rendezveny-box">
  <form action="rendezvenyek.php" method="post">
      <!-- Rendezvény neve -->
      <div>
        <h1>Rendezvény</h1>
      </div>

      <!-- Rendezvény kép -->
      <div>
        <img src="rendezveny_kepek/teszt_kep.jpg" alt="..." class="rend_kep">
      </div>

      <!-- Leírás -->
      <div>
          <h3>Rendezvény leírás</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui excepturi ab incidunt quae vitae sequi soluta suscipit pariatur dolorem dolor cumque enim delectus non, voluptatem tenetur alias porro quaerat voluptas.</p>
      </div>

      <!-- Helyszín -->
      <div>
        <h3>Helyszín</h3>
        <p>1234, Budapest, József körút, 13/B.</p>
        <iframe allowfullscreen="" class="terkep" aria-hidden="false" frameborder="1" height="100%" scrolling="yes" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2697.9380368470597!2d19.09062471593943!3d47.45214727917483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shu!2shu!4v1594047293806!5m2!1shu!2shu" style="border:0;" tabindex="0" width="100%"></iframe>
      </div>

      <!-- Árak -->
      <div>
          <h3>Árak</h3>
          <table>
            <tr>
                <th>Jegytípusok</th> 
            </tr>
            <tr>
                <td> <input type="radio" name="" id=""> Gyerek</td>
                <td>7-14 éves korig</td>
                <td>1000Ft</td>
            </tr>
            <tr>
                <td> <input type="radio" name="" id=""> Diák</td>
                <td>Diákigazolvánnyal</td>
                <td>1500Ft</td>
            </tr>
            <tr>
                <td> <input type="radio" name="" id=""> Normál</td>
                <td>Igazolványok nélkül</td>
                <td>2300Ft</td>
            </tr>
            <tr>
                <td> <input type="radio" name="" id=""> Csoportos</td>
                <td>5 fős</td>
                <td>5600Ft</td>
            </tr>

          </table>
          <p>
            
          </p>
      </div>

      <!-- Fizetés -->
      <div id="">
        <input type="submit" value="Fizetés">
      </div>
  </form>
</div>
</body>
</html>

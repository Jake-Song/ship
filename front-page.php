<?php
  /*
  Template Name: Front Page
  */
  get_header();
?>

     <div class="slider">
        <div class="slide active">
          <img src="./wp-content/themes/ship/img/bram-naus-200967.jpg" alt="">
          <div class="slide-text">
            <h3>Slide One</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, fuga itaque commodi. Quidem facere totam perspiciatis voluptatibus harum obcaecati blanditiis itaque in quos libero architecto, ratione tempore necessitatibus alias quam.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/christopher-gower-291246.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Two</h3>
            <p>Illo fugiat earum dicta aliquam eius, iure deserunt neque perspiciatis veniam temporibus unde qui ut voluptates provident dolores nulla, maxime, eveniet quis enim consequatur incidunt cumque cupiditate odio! Cum, praesentium.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/emile-perron-190221.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Three</h3>
            <p>Magnam architecto quisquam recusandae, molestiae rerum, adipisci. Excepturi quo repellendus numquam, nesciunt harum ipsum eaque assumenda dolore, placeat est provident quasi itaque architecto ducimus fugit eveniet eum voluptate rem dolorum.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/ian-schneider-59335.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Four</h3>
            <p>Quis voluptatem voluptas alias numquam, soluta ratione dolorem quibusdam culpa voluptates dicta animi enim accusamus libero doloribus laudantium ipsum est nihil ad minus? Est veniam ipsa, optio quaerat aliquam earum.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/mark-cruz-230099.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Five</h3>
            <p>Mollitia explicabo obcaecati, voluptate quod, quae debitis delectus! Hic tempore assumenda autem laboriosam aperiam, error deserunt voluptates quos veritatis totam. Excepturi nemo voluptas fugiat incidunt placeat similique aut recusandae asperiores!</p>
          </div>
        </div>
        <div class="selector-wrapper">
            <button id="play"><i class="fa fa-play-circle" aria-hidden="true"></i></button>
            <button id="pause"><i class="fa fa-pause-circle" aria-hidden="true"></i></button>
            <div class="selector current" data-index=0></div>
            <div class="selector" data-index=1></div>
            <div class="selector" data-index=2></div>
            <div class="selector" data-index=3></div>
            <div class="selector" data-index=4></div>
        </div>
        <button id="previous"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></button>
        <button id="next"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>

      </div>

    <div class="content-box">
      <h2>매물 현황</h2>
      <div id="icon-menu">
        <ul>
          <li>어선</li>
          <li>기타선</li>
          <li>요트</li>
          <li>보트</li>
          <li></li>
        </ul>
      </div>


    </div>

<?php get_footer(); ?>

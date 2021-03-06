<?php
include("includes/header.php");
if (isset($_GET['category'])) {
  $category = mysqli_real_escape_string($db , $_GET['category']);
  $query = "SELECT * FROM posts WHERE category='$category'";
}else{
$query= "SELECT * FROM posts'";
}
$posts = $db->query($query);

?>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>
</div>



<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        From the Firehose
      </h3>
      <?php if($posts->num_rows>0){
        while ($row= $posts->fetch_assoc()) {

      ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id']?>"><?php echo $row['title'];?></a></h2>
        <p class="blog-post-meta"><?php echo $row['date'];?> by <a href="#"><?php echo $row['author'];?></a></p>
        <?php $body = $row['body'];
        echo substr($body, 0, 500) . '....';
        ?>
        <a href="<?php echo $row['id']?>" class="btn btn-primary" >Read More </a>
        <hr>
      </div><!-- /.blog-post -->
<?php } } ?>



      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div><!-- /.blog-main -->
<?php
include("includes/sidebar.php");
 ?>
  </div><!-- /.row -->

</main><!-- /.container -->

<section id="Subscribesection" >
<div style="text-align: center;background:black;padding:30px;margin-Top:20px;margin-bottom:20px;">
  <hr>
  <h2 style="color:white;">Subscribe</h2>
  <br>
  <form method="post" action="">
    <input type="email" placeholder="enter your email" name="Subscribemail" style="margin-Right:20px;">
     <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
</div>
</section>
<?php
include("includes/footer.php");
 ?>

jQuery( document ).ready( function($){

  // Initialize Checkbox
  var items = $("input[type='checkbox']");
  for( var i = 0; i < items.length; i++ ){
    if(items[i].checked === true){
      items[i].checked = false;
    }
  }

  // All Checkbox
  var allCheckBox = $("input[name='all-checked']");
  if( allCheckBox ){
    allCheckBox.on( 'change', function() {
      var everyCheckBox = $("input[name='buy-check']");
      if(this.checked) {
        for(var i = 0; i < everyCheckBox.length; i++){
          everyCheckBox[i].checked = true;
        }
      } else {
        for(var i = 0; i < everyCheckBox.length; i++){
          everyCheckBox[i].checked = false;
        }
      }
    });
  }

  // Create Post

  var addPostBtn = $('#add-post-button');
  var buyPostCon = $("#buy .bbs-table ul");

  if(addPostBtn){
    addPostBtn.on('click', function(){

      var ourPostData = {
        "title": $(".add-post-box [name='title']").val(),
        "content": $(".add-post-box [name='content']").val(),
        "status": "publish"
      }

      $.ajax({
        url: "http://localhost/wordpress12/wp-json/wp/v2/ship_selling",
        type: 'POST',
        dataType: 'json',
        data: ourPostData,
        beforeSend: function( xhr ){
          xhr.setRequestHeader("X-WP-Nonce", apiData.nonce);
        },
        success: function(){
          $(".add-post-box [name='title']").val("");
          $(".add-post-box [name='content']").val("");
          window.location.reload();
        },
        error: function(){
          alert('Error - try again');
        }
      });
    });
  }

  // Delete Post
  var deleteBtn = $('#delete');
  if( deleteBtn ){
    deleteBtn.on('click', function(){

      var items = $("input[name='buy-check']:checked");
      var test = 0;
      for( var i = 0; i < items.length; i++ ){

          $.ajax({
            url: 'http://localhost/wordpress12/wp-json/wp/v2/ship_selling/' + $(items[i]).val(),
            type: 'DELETE',
            dataType: 'json',
            beforeSend: function( xhr ){
              xhr.setRequestHeader("X-WP-Nonce", apiData.nonce);
            },
            success: function(data){
                console.log(data);
                $('#item-' + data.id).remove();
            },
            error: function(){
              console.log('error occured during ajax');
            }
          });
        }
    });
  }

  // Read Post
  $("body").on('click', 'ul.list > li > a', function(e){
    e.preventDefault();
    console.log(this);
    $.ajax({
      url: 'http://localhost/wordpress12/wp-json/wp/v2/ship_selling/' + $(this).siblings("input[name='buy-check']").val(),
      type: 'GET',
      dataType: 'json',
      beforeSend: function( xhr ){

      },
      success: function(data){
          console.log(data);
          createHTML(data);
      },
      error: function(){
        console.log('error occured during ajax');
      }
    });
  });

  function createHTML(postData){
    var postTitle = '';
    var postContent = '';

    postTitle = postData.title.rendered;
    postContent = postData.content.rendered;

    $("#item-" + postData.id + " .read-post-box > input").val( postTitle );
    $("#item-" + postData.id + " .read-post-box > textarea").html( postContent );

    $("#item-" + postData.id + " .read-post-box").toggle();

  }

  // Update Post
  var updateBtn = $("#update-post-button");
  if( updateBtn ){
    updateBtn.on('click', function(){
      var ourPostData = {
        "title": $(".read-post-box [name='title']").val(),
        "content": $(".read-post-box [name='content']").val(),
        "status": "publish"
      }
      $.ajax({
        url: "http://localhost/wordpress12/wp-json/wp/v2/ship_selling/" + $(this).parent().siblings("input[name='buy-check']").val(),
        type: 'POST',
        dataType: 'json',
        data: ourPostData,
        beforeSend: function( xhr ){
          xhr.setRequestHeader("X-WP-Nonce", apiData.nonce);
        },
        success: function(data){
          console.log(data);
          $(".read-post-box [name='title']").val();
          $(".read-post-box [name='content']").val();
          $(".read-post-box").css("display", "none");
        },
        error: function(){
          alert('Error - try again');
        }
      });
    });
  }
});

var portfolioPostBtn = document.getElementById('portfolio-posts-btn');
var portfolioPostsContainer = document.getElementById('portfolio-posts-container');

if(portfolioPostBtn) {
  portfolioPostBtn.addEventListener('click', function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'http://localhost/wordpress12/wp-json/wp/v2/ship?ship_category=3');
    ourRequest.onload = function() {
      if (ourRequest.status >= 200 && ourRequest.status < 400) {
        var data = JSON.parse(ourRequest.responseText);
        console.log(data);
        createHTML(data);
        portfolioPostBtn.remove();
      } else {
        console.log("We connected to the server, but it returned an error.");
      }
    };

    ourRequest.onerror = function() {
      console.log("Connection error");
    };

    ourRequest.send();
  });
}

function createHTML(postsData){
  var ourHTMLString = '';
  for(var i = 0; i < postsData.length; i++){
    ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';
    ourHTMLString += postsData[i].content.rendered;
  }
  portfolioPostsContainer.innerHTML = ourHTMLString;


}

// Quick add post ajax
var quickAddBtn = document.querySelector('#quick-add-button');
if(quickAddBtn){
  quickAddBtn.addEventListener('click', function(){

    var ourPostData = {
      "title": document.querySelector(".admin-quick-add [name='title']").value,
      "content": document.querySelector(".admin-quick-add [name='content']").value,
      "status": "publish"
    }

    var createPost = new XMLHttpRequest();
    createPost.open("POST", "http://localhost/wordpress12/wp-json/wp/v2/ship_selling");
    createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
    createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    createPost.send(JSON.stringify(ourPostData));
    createPost.onreadystatechange = function(){
      if(createPost.readyState == 4){
        if(createPost.status == 201){
          document.querySelector(".admin-quick-add [name='title']").value = '';
          document.querySelector(".admin-quick-add [name='content']").value= '';
          window.location.reload();
        } else {
          alert('Error - try again');
        }
      }
    }
  });
}

// Delete post
var deleteBtn = document.querySelector('#delete');

if(deleteBtn){
  deleteBtn.addEventListener('click', function(){
    var items = document.querySelectorAll("[name='buy-check']");
    var activeAjax = 0;
    for( var i = 0; i < items.length; i++ ){
      if( items[i].checked ){
        var deletePost = new XMLHttpRequest();
        deletePost.open('DELETE', 'http://localhost/wordpress12/wp-json/wp/v2/ship_selling/' + items[i].value, true);
        activeAjax++;
        deletePost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
        deletePost.onreadystatechange = function() {
          if (deletePost.status == 200 && deletePost.readyState == 4) {
              console.log(deletePost.responseText);
              activeAjax--;
          } else {
            console.log("Error");
          }
        };

        deletePost.onerror = function() {
          console.log("Connection error");
        };

        deletePost.send();

      }

    }
    if( activeAjax === 0 ){
      window.location.reload();
    }
  });
}

window.onload = function(){
  var items = document.querySelectorAll("[name='buy-check']");
  for( var i = 0; i < items.length; i++ ){
    if(items[i].checked === true){
      items[i].checked = false;
    }
  }
};

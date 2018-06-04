$(document).ready(function(){
    $(".latest-project-thumbnail").hover(function(){
        $(this).find(".project-overlay").slideToggle(),$(this).find(".project-category").slideToggle()
    })
});

// var commentform = document.querySelector('form.comment-form');
// function addListItem(e){
//     e.preventDefault();
//     var input = document.getElementById("comment");
//     var comment = document.createElement("li.list-group-item");
//     comment.textContent = input.value;
//     var list = document.querySelector("ul.comments-list");
//     list.appendChild(comment);
// }
// commentform.addEventListener("submit", addListItem);

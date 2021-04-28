require('../css/blog.scss');

$(document).ready(function () {
    blog.init();
});

let blog = {};

blog.init = function () {

    $('a#deletePost').click(blog.deletePost);
};

blog.deletePost = function (e) {
    e.preventDefault();

    let url = $(this).attr('href');

    if (confirm("Are you sure?")) {
        window.location = url;
    }
};

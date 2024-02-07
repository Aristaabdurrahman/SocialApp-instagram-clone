function follow(id, el) {
    fetch('/follow/' + id).then(response => response.json()).then(data => {
        el.innerText = (data.status == 'FOLLOW') ? 'unfollow' : "follow" 
    });
}

function savedPost(id, el) {
    fetch('/savedpost/' + id).then(response => response.json()).then(data => {
        el.innerText = (data.status == 'SAVE') ? 'unsave' : "save" 
    });
}

function like(id, el, type='POST') {

    let likecount = 0;
    if (type == 'POST') {
        likecount = document.getElementById('post-like-count-' + id);
    } else {
        likecount = document.getElementById('comment-like-count-' + id);
    }

    fetch('/like/' + type + '/' + id).then(response => response.json())
    .then(data => {
        let temp = 0;
        if (data.status == 'LIKE') {
            temp = parseInt(likecount.innerHTML) + 1;
            el.innerText = 'unlike';
        } else {
            temp = parseInt(likecount.innerHTML) - 1;
            el.innerText = 'like';
        }
        
        likecount.innerHTML = temp + " likes";
    });
}

function preview() {
    document.getElementById('preview-img').src = URL.createObjectURL(event.target.files[0]);
}

// document.querySelectorAll(".captions").forEach(function (el) {
//     let renderText = el.innerHTML.replace(/#(\w+)/g, "<a href='/search?search=%23$1'>#$1</a>");
//     el.innerHTML = renderText;
// });


                        
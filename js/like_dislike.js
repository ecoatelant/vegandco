const initApp = async () => {
    listenForLikes();
}

const listenForLikes = () => {
    const likes = document.querySelectorAll(".likes");
    likes.forEach(like => {
        like.addEventListener("click", (e) => {
            e.target.classList.toggle("like");
            e.target.classList.toggle("dislike");
        })
    })
}
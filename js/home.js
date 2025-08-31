// Video Player Functionality
document.addEventListener("DOMContentLoaded", function () {
  const playButton = document.querySelector(".play-button");
  const videoThumbnail = document.querySelector(".video-thumbnail");
  const videoEmbed = document.querySelector(".video-embed");
  const videoModal = new bootstrap.Modal(document.getElementById("videoModal"));

  const isMobile = window.matchMedia("(max-width: 768px)").matches;

  playButton.addEventListener("click", function () {
    if (isMobile) {
      // Show modal on mobile
      document.getElementById("modalVideo").src =
        "https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1";
      videoModal.show();
    } else {
      // Show inline on desktop
      videoThumbnail.classList.add("d-none");
      videoEmbed.classList.remove("d-none");
      document.getElementById("bakeryVideo").src += "&autoplay=1";
    }
  });

  document.querySelectorAll(".chapter-item").forEach((item) => {
    item.addEventListener("click", function () {
      const time = this.getAttribute("data-video-time");
      if (isMobile) {
        document.getElementById(
          "modalVideo"
        ).src = `https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1&start=${time}`;
        videoModal.show();
      } else {
        videoThumbnail.classList.add("d-none");
        videoEmbed.classList.remove("d-none");
        document.getElementById(
          "bakeryVideo"
        ).src = `https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1&start=${time}`;
      }
    });
  });

  document
    .getElementById("videoModal")
    .addEventListener("hidden.bs.modal", function () {
      document.getElementById("modalVideo").src = "";
    });
});

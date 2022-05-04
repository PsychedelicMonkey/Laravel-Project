import lightGallery from "lightgallery";

const gallery = document.querySelector(".gallery");

const lightbox = lightGallery(gallery, {
    download: false,
    licenseKey: process.env.MIX_LIGHTGALLERY_LICENSE_KEY,
    selector: ".gallery-item",
});

export default lightbox;

import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html"),
    new Route("/contact", "Contact", "/pages/contact.html"),
    new Route("/apropos", "A Propos", "/pages/apropos.html"),
];
//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Psychologie";


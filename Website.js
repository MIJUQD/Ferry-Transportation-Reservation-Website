document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("Home_Link").addEventListener("click", function (event) {
        event.preventDefault();
        HTML_Content('Home.html', 'Content_Container');
    });

    document.getElementById("Register_Link").addEventListener("click", function (event) {
        event.preventDefault();
        HTML_Content('Register.html', 'Content_Container');
    });

    document.getElementById("Schedules_Link").addEventListener("click", function (event) {
        event.preventDefault();
        HTML_Content('Ships_Schedules.html', 'Content_Container');
    });

    document.getElementById("Transfer_Fees_Link").addEventListener("click", function (event) {
        event.preventDefault();
        HTML_Content('Transfer_Fees.html', 'Content_Container');
    });

    function HTML_Content(htmlFile, containerId) {
        fetch(htmlFile)
            .then(response => response.text())
            .then(htmlData => {
                const container = document.getElementById(containerId);
                container.innerHTML = htmlData;
            })
            .catch(error => console.error('Error fetching HTML:', error));
    }
    
    const menuLinks = document.querySelectorAll(".menu a");

    menuLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            menuLinks.forEach(function (link) {
                link.classList.remove("active");
            });
            event.target.classList.add("active");
        });
    });
});
function switchTab(evt, tab_id) {
    let i, tabContent, tabMenu;
    tabContent = document.getElementsByClassName("tabs_content--item");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }
    tabMenu = document.getElementsByClassName("tab-item");
    for (i = 0; i < tabMenu.length; i++) {
        tabMenu[i].className = tabMenu[i].className.replace(" active", "");
    }
    document.getElementById(tab_id).style.display = "block";
    evt.currentTarget.className += " active";
}
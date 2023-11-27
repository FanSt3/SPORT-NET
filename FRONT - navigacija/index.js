function toggle_nav_items() {
   const compact_nav = document.getElementById("compact-nav");
   const button_toggle_nav_items = document.getElementById("button-toggle-nav-items");

   if (compact_nav.style.maxHeight == "0px")
   {
      compact_nav.style.maxHeight = "220px";
      button_toggle_nav_items.style.outline = "1px dotted rgb(200, 200, 200)";
   }
   else 
   {
      compact_nav.style.maxHeight = "0px";
      button_toggle_nav_items.style.outline = "";
   }
}

function change_header_search_bar_icon() {
   const header_search_bar_icon = document.getElementById("header-search-bar-icon");
   
   header_search_bar_icon.style.color = "#000000";
}

function revert_header_search_bar_icon() {
   const header_search_bar_icon = document.getElementById("header-search-bar-icon");
   
   header_search_bar_icon.style.color = "";
}
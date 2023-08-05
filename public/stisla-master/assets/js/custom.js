/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
// Data Table
$(document).ready(function () {
  $("#table1").DataTable();
});

// Delete
function submitDel(id) {
  $("#del-" + id).submit();
}

function returnLogout() {
  var link = $("#logout").attr("href");
  $(location).attr("href", link);
}

var path = location.pathname.split("/");
var url = location.origin + "/" + path[1] + "/" + path[2];
$("ul.sidebar-menu li a").each(function () {
  if ($(this).attr("href").indexOf(url) !== -1) {
    $(this)
      .parent()
      .addClass("active")
      .parent()
      .parent("li")
      .addClass("active");
  }
});

console.log(url);

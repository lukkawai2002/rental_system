function delete_notice() {

    const response = confirm("Are you sure you want to delete the notice?");

if (response) {
    window.location = "delete_notice.php";
}

}

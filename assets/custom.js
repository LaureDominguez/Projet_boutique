function confirmDelete(id){
    const deleteId = window.confirm("Effacer ce produit ?");
    console.log(deleteId);
    if (deleteId){
        window.location.href = "index.php?page=deleteproduct&product_id=" + id;
    }
}
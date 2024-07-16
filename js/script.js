function filterCategory() {
  document.getElementById("filterForm").submit();
}

document.addEventListener("DOMContentLoaded", () => {
  // let products = [];
  // fetch("../product.json")
  //   .then((response) => {
  //     if (!response.ok) {
  //       throw new Error("Tidak ada respon " + response.statusText);
  //     }
  //     return response.json();
  //   })
  //   .then((data) => {
  //     products = data;
  //     console.log("Produk diproses:", products);
  //     displayProducts(products);
  //   })
  //   .catch((error) => {
  //     console.error("Proses barang gagal mungkin ada eror :", error);
  //   });

  // const categorySelect = document.getElementById("category-select");
  // categorySelect.addEventListener("change", () => {
  //   const selectedCategory = categorySelect.value;
  //   filter(selectedCategory);
  // });

  function formatRupiah(angka) {
    return (
      "Rp" +
      angka.toLocaleString("id-ID", {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
      })
    );
  }

  function displayProducts(isiproduk) {
    const productList = document.getElementById("product-list");
    productList.innerHTML = ""; // Clear the product list

    isiproduk.forEach((product) => {
      // nambahin form
      const productDiv = document.createElement("form");
      productDiv.classList.add("card");
      // nambahin form

      // nambahin img
      const productImage = document.createElement("img");
      productImage.src = product.image;
      productImage.alt = product.name;
      productImage.setAttribute("name", "product-img");
      productDiv.appendChild(productImage);
      // nambahin img

      // nambahin teks judul barang
      const productName = document.createElement("h3");
      productName.textContent = product.name;
      productName.setAttribute("name", "title");
      productName.classList.add("title-product");
      productDiv.appendChild(productName);
      // nambahin teks judul barang

      // nambahin teks deskripsi barang
      const productCategory = document.createElement("p");
      productCategory.textContent = product.category;
      productCategory.setAttribute("name", "category");
      productCategory.classList.add("category");
      productDiv.appendChild(productCategory);
      // nambahin teks deskripsi barang

      // nambahin teks deskripsi barang
      const productDescription = document.createElement("p");
      productDescription.textContent = product.description;
      productDescription.setAttribute("name", "description");
      productDescription.classList.add("desc-product");
      productDiv.appendChild(productDescription);
      // nambahin teks deskripsi barang

      // nambahin teks harga Barang
      const productPrice = document.createElement("p");
      productPrice.textContent = `Harga : ${formatRupiah(product.price)}`;
      productPrice.setAttribute("name", "price");
      productPrice.classList.add("price");
      productDiv.appendChild(productPrice);
      // nambahin teks harga Barang

      // nambahin teks harga Barang
      const productButton = document.createElement("button");
      productButton.textContent = `Beli`;
      productButton.setAttribute("name", "buy");
      productButton.classList.add("btn-buy");
      productDiv.appendChild(productButton);
      // nambahin teks harga Barang

      productList.appendChild(productDiv);
    });
  }

  // untuk filter sesuai kategori
  function filter(category) {
    if (category === "All") {
      displayProducts(products);
    } else {
      const filterDisplay = products.filter(
        (product) => product.category === category
      );
      displayProducts(filterDisplay);
    }
  }
});

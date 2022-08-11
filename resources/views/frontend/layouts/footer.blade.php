{{-- 
<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="/templates/frontend/js/owl.carousel.min.js"></script>
<script src="/templates/frontend/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="/templates/frontend/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="/templates/frontend/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="/templates/frontend/js/bxslider.min.js"></script>
<script type="text/javascript" src="/templates/frontend/js/script.slider.js"></script>
<style>
    .single-shop-product {
        overflow: hidden;
    }
</style>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/templates/frontend/js/menu.js"></script>
<script>
    // function listProduct() {
    //     axios.get('http://localhost:3000/products')
    //         .then(function(res) {
    //             var list = document.querySelector('#list-product');;
    //
    //             list.innerHTML += res.data.map(function (pro) {
    //                 return`
    //                 <div class="col-md-3 col-sm-6">
    //                     <div class="single-shop-product" onclick="productDetail(${pro.id})" style="height:366px;">
    //                         <div class="product-upper" style="width: 214px; height: 214px;">
    //                             <img src="${pro.image}" alt="">
    //                         </div>
    //                         <h4><a href="chi-tiet-san-pham.html?id=${pro.id}">${pro.name}</a></h4>
    //                         <div class="product-carousel-price">
    //                             <ins>${pro.price} VND</ins>
    //                         </div>
    //
    //                         <div class="product-option-shop">
    //                             <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
    //                                 rel="nofollow" href="" onclick="mua(${pro.id})">Add to cart</a>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 `;
    //             }).join('');
    //         })
    // }

    // function mua(id) {
    //     myCart = localStorage.getItem('myCart');
    //     if(myCart == null) {
    //         myCart = {}
    //     } else {
    //         myCart = JSON.parse(myCart);
    //     }
    //     console.log("Giỏ hàng trước khi mua");
    //     console.log(myCart);

    //     if(myCart[id] != undefined) {
    //         myCart[id] = myCart[id] + 1;
    //     }
    //     else {
    //         myCart[id] = 1;
    //     }
    //     console.log("Biến myCart sau khi cộng thêm");
    //     console.log(myCart);
    //     localStorage.setItem('myCart', JSON.stringify(myCart));
    // }

    // axios.all([listCategories(),listProduct()])
    // function loadData(page, per_page){
    //     var option = {
    //         url: 'http://localhost:3000/products?page='+page+'&per_page='+ per_page,
    //         method:'GET',
    //         responseType:'json'
    //     }
    //
    //     axios(option)
    //         .then( function (res){
    //             console.log(res);
    //             showData(res.data, per_page)
    //         })
    //         .catch(function (ex){
    //             console.log(ex);
    //         });
    // }
    //
    // function showData(du_lieu, per_page){
    //     console.log(du_lieu);
    //     du_lieu.data.forEach(function(pro){
    //         str_li = `<div class="col-md-3 col-sm-6">
    //                     <div class="single-shop-product" onclick="productDetail(${pro.id})" style="height:366px;">
    //                         <div class="product-upper" style="width: 214px; height: 214px;">
    //                             <img src="${pro.image}" alt="">
    //                         </div>
    //                         <h4><a href="chi-tiet-san-pham.html?id=${pro.id}">${pro.name}</a></h4>
    //                         <div class="product-carousel-price">
    //                             <ins>${pro.price} VND</ins>
    //                         </div>
    //
    //                         <div class="product-option-shop">
    //                             <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
    //                                 rel="nofollow" href="" onclick="mua(${pro.id})">Add to cart</a>
    //                         </div>
    //                     </div>
    //                 </div>`
    //     });
    //     document.querySelector('#list-product').innerHTML += str_li;
    //     //======== hiển thị số trang
    //     li_page = ''
    //     for(i = 1; i<= du_lieu.total_pages; i++){
    //         li_page += '<li><a href="#"  onclick = "loadData('+i+','+per_page+')" >' + i + '</a></li>';
    //     }
    //     document.querySelector('#list_page').innerHTML = li_page;
    // }
    //
    // loadData(1,3)
</script> --}}

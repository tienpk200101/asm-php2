function listCategories() {
    axios.get('http://localhost:3000/categories')
    .then(function(res) {
        cat_arr = res.data.map( cat => {
            return `
            <li><a href="">${cat.name}</a></li>
            `;
        });
        cat_arr.push(`<li><a href="lien-he.html">Liên hệ</a></li>`);
        document.querySelector('#mainmenu').innerHTML += cat_arr.join('');
    })
}
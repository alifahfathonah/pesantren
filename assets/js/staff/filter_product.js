function filter_product(data, base_url) {
	const master = JSON.parse(data);
    let all_items = [];
    for (let i = 0; i < master.length; i++) {
        const items = master[i].items;
        for (let j = 0; j < items.length; j++) {
            all_items.push(items[j]);
        }
    }

    return function filter_by_category(index) {
        let items;
        if (index == -1) {
            $('#category-title').text('Produk');
            items = all_items;
        } else {
            const category = master[index];
            $('#category-title').text('Produk - ' + category.name);
            items = category.items;
        }

        if (items.length <= 0) {
            $('#item-list').text('Produk tidak ditemukan');
        } else {
            let html = '';
            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                html += '<div class="col-md-3">' +
                        '<a href="javascript:;" onclick="document.getElementById(\'bonus-enabled\').checked ? bonus_item(' + item.item_id + ', \'' + item.name + '\', ' + item.price + ', ' + item.stock + ') : bought_item(' + item.item_id + ', \'' + item.name + '\', ' + item.price + ', ' + item.stock + ')" class="meet-our-team thumbnail">' +
                            '<center>' +
                            '<h6>' + item.name + '</h6>' +
                            '<img src="' + base_url + 'assets/esteh.png' + '" alt="" class="img-responsive"></center>' +
                        '</a>' +
                    '</div>';
            }

            $('#item-list').html(html);
        }
    };
}
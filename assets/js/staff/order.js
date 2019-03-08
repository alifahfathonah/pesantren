let bought_items = [];
let bonus_items = [];

function check_bought_item(item_id) {
    return bought_items.findIndex(item => item.item_id == item_id);
}

function check_bonus_item(item_id) {
    return bonus_items.findIndex(item => item.item_id == item_id);
}

function bought_item(item_id, name, price, stock) {
    const item = {
        item_id: item_id,
        name: name,
        price: price,
        stock: stock,
        quantity: 1
    };

    const index = check_bought_item(item_id);
    if (index == -1) {
        bought_items.push(item);
        bought_row(item_id, name, price, stock);
    } else {
        bought_items[index].quantity++;
        $('#qty-' + item_id).val(bought_items[index].quantity);
        change_item_state(item_id);
    }

    calculate_total();
}

function bonus_item(item_id, name, price, stock) {
    const item = {
        item_id: item_id,
        name: name,
        price: price,
        stock: stock,
        quantity: 1
    };

    const index = check_bonus_item(item_id);
    if (index == -1) {
        bonus_items.push(item);
        bonus_row(item_id, name, price, stock);
    } else {
        bonus_items[index].quantity++;
        $('#qty-bonus-' + item_id).val(bonus_items[index].quantity);
        change_bonus_state(item_id);
    }
}

function bought_row(item_id, name, price, stock) {
    $('#bought-items').append('<tr>' +
            '<td>' + name + '</td>' +
            '<td>' +
                '<input type="hidden" name="item_id[]" value="' + item_id + '"/>' +
                '<input id="qty-' + item_id + '" type="number" onkeyup="change_item_state(' + item_id + ');" onchange="change_item_state(' + item_id + ');" name="qty[]" value="1" min="1" max="' + stock + '" class="form-control input-sm input-circle noborder"></td>' +
            '<td style="text-align: center;">' + number_to_rupiah(price) + '</td>' +
            '<td>' +
                '<input type="number" onkeyup="change_item_state(' + item_id + ');" onchange="change_item_state(' + item_id + ');" id="custom_price-' + item_id + '" name="custom_price[]" value="' + price + '" class="form-control input-sm input-circle noborder">' +
            '</td>' +
            '<td id="total-' + item_id + '">' + number_to_rupiah(price) + '</td>' +
            '<td>' +
                '<button type="button" onclick="remove_item(' + item_id + ', this);" class="btn btn-outline btn-circle btn-xs red"><i class="fa fa-times"></i></button>' +
            '</td>' +
        '</tr>'); 
}

function bonus_row(item_id, name, price, stock) {
    $('#bonus-items').append('<tr>' +
            '<td>' + name + '</td>' +
            '<td style="text-align: center;">' +
                '<input type="hidden" name="item_id_bonus[]" value="' + item_id + '"/>' +
                '<input id="qty-bonus-' + item_id + '" type="number" onkeyup="change_bonus_state(' + item_id + ');" onchange="change_bonus_state(' + item_id + ');" name="qty_bonus[]" value="1" min="1" max="' + stock + '" class="form-control input-sm input-circle noborder"></td>' +
            '</td>' +
            '<td>' +
                '<button type="button" onclick="remove_item(' + item_id + ', this);" class="btn btn-outline btn-circle btn-xs red"><i class="fa fa-times"></i></button>' +
            '</td>' +
        '</tr>');
}

function change_item_state(item_id) {
    const qty = $('#qty-' + item_id).val();
    let custom_price = $('#custom_price-' + item_id).val();
    $('#total-' + item_id).text(number_to_rupiah(qty * custom_price));
    bought_items[check_bought_item(item_id)].quantity = qty;
    calculate_total();
}

function change_bonus_state(item_id) {
    const qty = $('#qty-bonus-' + item_id).val();
    bonus_items[check_bonus_item(item_id)].quantity = qty;
}

function remove_item(item_id, obj) {
    $(obj).parent().parent().remove();
    bought_items.splice(check_bought_item(item_id), 1);
    calculate_total();
}

function calculate_total() {
    const qty = $('input[name="qty[]"]');
    const custom_price = $('input[name="custom_price[]"]');
    let total = 0;
    for (let i = 0; i < qty.length; i++) {
        total += qty[i].value * custom_price[i].value;
    }
    $('#total-price').text(number_to_rupiah(total));
    $('input[name="total-price"]').val(total);
}
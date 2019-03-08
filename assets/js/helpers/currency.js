function number_to_rupiah(number) {
    let rupiah = '';        
    const numberstr = number.toString().split('').reverse().join('');
    for(var i = 0; i < numberstr.length; i++) if (i % 3 == 0) rupiah += numberstr.substr(i,3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}
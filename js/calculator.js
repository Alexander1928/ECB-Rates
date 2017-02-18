

$('#calculateBtn').click(function() {
    var haveCurrencyAmount = $('#haveCurrencyAmount').val();
    var haveCurrencyName = $('#haveCurrencyName').val();
    var needCurrencyName = $('#needCurrencyName').val();
    
    
    var ouputText = calculate(haveCurrencyAmount, haveCurrencyName, needCurrencyName, rates) + ' ' + needCurrencyName;
    $('#needCurrencyText').val(ouputText);
});

function calculate(haveCurrencyAmount, haveCurrencyName, needCurrencyName, rates) {
    return haveCurrencyAmount / rates[haveCurrencyName] * rates[needCurrencyName];
}
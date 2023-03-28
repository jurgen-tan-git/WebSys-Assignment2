function convert() {
  const amount = document.getElementById('amount').value;
  const from = document.getElementById('from').value;
  const to = document.getElementById('to').value;
  const url = `https://openexchangerates.org/api/latest.json?app_id=634728f310db4b40b108e5d2749b393f`;
  fetch(url)
    .then(response => response.json())
    .then(data => {
      const rate = data.rates[to] / data.rates[from];
      const result = (amount * rate).toFixed(2);
      document.getElementById('result').value = result;
    });
}



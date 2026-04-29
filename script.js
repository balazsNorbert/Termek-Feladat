async function loadProducts() {
    const response = await fetch('api.php');
    const products = await response.json();
    const container = document.getElementById('product-list');

    products.forEach(p => {
        const isOutOfStock = p.keszlet === 0;
        const card = document.createElement('div');
        card.className = `card ${isOutOfStock ? 'out-of-stock' : ''}`;

        card.innerHTML = `
            <div>
              <img src="${p.kep}" alt="${p.nev}">
              <h3>${p.nev}</h3>
              <p>Ár: ${p.ar}</p>
            </div>
            ${isOutOfStock ? '<button class="btn-notify">Értesítést kérek</button>' : '<button>Kosárba</button>'}
        `;
        container.appendChild(card);
    });
}

loadProducts();
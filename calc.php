<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Цены — Vaiur-Plast</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div class="header-inner">
      <div class="logo">
        <a href="index.html"><img class="site-logo" src="image/Group 3.svg" alt="Vaiur-Plast"></a>
      </div>
      <nav>
        <a href="index.html">Главная</a>
        <a href="okna.html">Окна</a>
        <a href="dveri.html">Двери</a>
        <a href="balkony.html">Балконы</a>
        <a href="calc.php">Цены</a>
      </nav>
    </div>
  </header>

  <main class="section">
    <div class="section-inner">
      <div class="section-header">
        <div class="section-tag">ЦЕНЫ</div>
        <h1 class="section-title">Ориентировочные цены и калькулятор</h1>
        <p class="section-sub">Примеры цен для стандартных окон и услуг. Точная стоимость рассчитывается после замера.
        </p>
      </div>

      <div class="page-hero">
        <div class="hero-image">
          <img class="img-cover" src="image/vekaCollection.jpg" alt="Цены">
        </div>
        <div>
          <h2>Как формируется цена</h2>
          <p>Стоимость зависит от профиля, размера, типа стеклопакета, сложности монтажа и дополнительных опций
            (ламинaция, откосы, отделка).</p>
          <p>Для точного расчёта оставьте контакт — наш специалист подготовит коммерческое предложение после выезда на
            замер.</p>
        </div>
      </div>

      <section class="section">
        <h2>Примеры ориентировочных цен</h2>
        <table>
          <tr>
            <th>Услуга</th>
            <th>Цена от</th>
          </tr>
          <tr>
            <td>Стандартное пластиковое окно 1,2×1,2 м (с установкой)</td>
            <td>от 150€</td>
          </tr>
          <tr>
            <td>Балконное остекление (холодное)</td>
            <td>от 500€</td>
          </tr>
          <tr>
            <td>Дверь ПВХ (входная)</td>
            <td>от 200€</td>
          </tr>
        </table>

        <h3>Калькулятор стоимости</h3>
        <p>Для быстрого ориентировочного расчёта воспользуйтесь калькулятором ниже. Точная цена после замера.</p>

        <div class="card" id="calculator">
          <label for="itemType"><strong>Выберите тип</strong></label>
          <select id="itemType">
          </select>

          <select id="material">

          </select>

          <div id="dimInputs" style="margin-top:12px">
            <label><small>Ширина (м)</small></label>
            <input type="number" id="width" step="0.01" min="0" value="1.2">
          </div>

          <div id="calcResult" style="margin-top:14px;font-weight:700"></div>
        </div>

        <script>
          const prices = [
            <?php
            include "connect.php";
            $query = mysqli_query($con, "SELECT * FROM prices");

            while ($row = mysqli_fetch_row($query)) {
              echo "['" . $row[1] . "', '" . $row[2] . "', " . $row[3] . "],\n";
            }
            mysqli_close($con);
            ?>
          ];

          const typeSelect = document.getElementById('itemType');
          const materialSelect = document.getElementById("material");
          const widthInput = document.getElementById("width");
          const result = document.getElementById("calcResult");

          {
            const types = [...new Set(prices.map(row => row[0]))];
            types.forEach(type => {
              console.log(type);
              const option = document.createElement("option");
              option.value = type;
              option.textContent = type;
              typeSelect.appendChild(option);
            });
          }

          function calculate() {
            const type = typeSelect.value;
            const material = materialSelect.value;
            const width = parseFloat(widthInput.value) || 0;

            const item = prices.find(
              row => row[0] === type && row[1] === material
            );

            const pricePerMeter = item ? item[2] : 0;
            const cost = width * pricePerMeter;

            result.textContent = `Стоимость: ${cost.toFixed(2)}`;
          }

          function updateMaterials() {
            const selectedType = typeSelect.value;

            materialSelect.innerHTML = "";

            prices
              .filter(row => row[0] === selectedType)
              .forEach(row => {
                const option = document.createElement("option");
                option.value = row[1];
                option.textContent = row[1];
                materialSelect.appendChild(option);
              });

            calculate();
          }
          updateMaterials();

          typeSelect.addEventListener("change", updateMaterials);
          materialSelect.addEventListener("change", calculate);
          widthInput.addEventListener("input", calculate);
        </script>
      </section>
    </div>
  </main>

  <footer>
    <div class="footer-inner">
      <div class="footer-grid">
        <div>
          <div class="footer-logo">Vaiur<span>-Plast</span></div>
          <p class="footer-desc">Производитель пластиковых окон и дверей ПВХ в Молдове. Профили VEKA, монтаж под ключ с
            гарантией.</p>
          <div class="footer-contact">
            <a href="tel:079036904">📞 079-036-904</a>
            <a href="mailto:milkapan@mail.ru">✉️ milkapan@mail.ru</a>
            <a href="mailto:prorab_ivan@mail.ru">✉️ prorab_ivan@mail.ru</a>
            <span>📍 ул. Вокзальная 65, Taraclia, Молдова</span>
          </div>
        </div>
        <div class="footer-col">
          <h4>Продукция</h4>
          <ul class="footer-links">
            <li><a href="okna.html">Окна ПВХ</a></li>
            <li><a href="dveri.html">Двери</a></li>
            <li><a href="balkony.html">Балконы</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Услуги</h4>
          <ul class="footer-links">
            <li><a href="remont.html">Ремонт окон</a></li>
            <li><a href="dizayn.html">Дизайн окна</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Компания</h4>
          <ul class="footer-links">
            <li><a href="about.html">О нас</a></li>
            <li><a href="news.html">Новости</a></li>
            <li><a href="contacts.html">Контакты</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© 2026 Vaiur-Plast MD</span>
        <div class="footer-socials">
          <a href="#" class="social-btn">f</a>
          <a href="#" class="social-btn">in</a>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
fetch("https://swapi.dev/api/people/")
  .then(function (response) {
    return response.json();
  })
  .then(function (json) {
    const tbody = document.querySelector("tbody");
    for (let item in json.results) {
      const name = json.results[item].name;
      const height = json.results[item].height;
      const gender = json.results[item].gender;

      const row = `
        <tr index="${item}">
          <td>${name}</td>
          <td>${gender}</td>
          <td>${height} cm</td>
        </tr>
      `;

      tbody.innerHTML += row;
    }

    const rows = document.querySelectorAll("tr");

    const title = document.getElementById("title");
    const cardInfo = document.getElementById("info");

    for (let i = 0; i < rows.length; i++) {
      rows[i].addEventListener("click", function () {
        writeCardInfo(i - 1);
      });
    }

    // Buttons
    var prevButton = document.getElementById("prev");
    var nextButton = document.getElementById("next");

    prevButton.addEventListener("click", function () {
      let prevIndex = cardInfo.getAttribute("index") - 1;

      if (prevIndex >= 0) {
        writeCardInfo(prevIndex);
      }
    });

    nextButton.addEventListener("click", function () {
      let nextIndex = parseInt(cardInfo.getAttribute("index"), 10) + 1;

      if (nextIndex < json.results.length) {
        writeCardInfo(nextIndex);
      }
    });

    function writeCardInfo(index) {
      let name = json.results[index].name;
      let gender = json.results[index].gender;
      let height = json.results[index].height + "cm";
      let eye_color = json.results[index].eye_color;
      let mass = json.results[index].mass;
      let hair_color = json.results[index].hair_color;

      cardInfo.setAttribute("index", index);
      title.textContent = name;
      cardInfo.textContent = `
      Nombre: ${name},
      Género: ${gender},
      Altura: ${height},
      Peso: ${mass},
      Color de pelo: ${hair_color},
      Color de ojos: ${eye_color}`;
    }
  });

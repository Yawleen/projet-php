const authorChoices = document.querySelector("#author-choices");
const authorChoiceDisplay = document.querySelector("#author-choice-display");
const authorSelect = document.querySelector("#author_select");
const authorText = document.querySelector("#author_text");
const genreChoices = document.querySelector("#genre-choices");
const genreChoiceDisplay = document.querySelector("#genre-choice-display");
const genreSelect = document.querySelector("#genre_select");
const genreText = document.querySelector("#genre_text");
const editorChoices = document.querySelector("#editor-choices");
const editorChoiceDisplay = document.querySelector("#editor-choice-display");
const editorSelect = document.querySelector("#editor_select");
const editorText = document.querySelector("#editor_text");

if (authorSelect) authorSelect.remove();
if (authorText) authorText.remove();
if (genreSelect) genreSelect.remove();
if (genreText) genreText.remove();
if (editorSelect) editorSelect.remove();
if (editorText) editorText.remove();

const selectChoice = (value, displayingArea, selectElement, textElement) => {
  switch (value) {
    case "1":
      displayingArea.innerHTML =
        "<div class='indication'>Choisissez ci-dessous :</div>";
      displayingArea.append(selectElement);
      break;

    case "2":
      displayingArea.innerHTML =
        "<div class='indication'>Saisissez ci-dessous :</div>";
      displayingArea.append(textElement);
      break;

    default:
      displayingArea.innerHTML = "";
      break;
  }
};

if (authorChoices)
  authorChoices.addEventListener("input", (e) =>
    selectChoice(e.target.value, authorChoiceDisplay, authorSelect, authorText)
  );

if (genreChoices)
  genreChoices.addEventListener("input", (e) =>
    selectChoice(e.target.value, genreChoiceDisplay, genreSelect, genreText)
  );

if (editorChoices)
  editorChoices.addEventListener("input", (e) =>
    selectChoice(e.target.value, editorChoiceDisplay, editorSelect, editorText)
  );

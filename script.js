const clearBtn = document.querySelector("#clearBtn");
const copyBtn = document.querySelector("#copyBtn");
const longUrl = document.querySelector("#longUrl");
const shortUrl = document.querySelector("#shortUrl");

clearBtn.addEventListener("click", () => {
  longUrl.value = "";
});

copyBtn.addEventListener("click", () => {
  shortUrl.select();
  navigator.clipboard.writeText(shortUrl.value);
  copyBtn.innerHTML = "Copied";
});

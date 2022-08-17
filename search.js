
					var contact = document.getElementById("contact");
					var active2 = document.getElementById("a2");
					var active1 = document.getElementById("a1");
					var active3 = document.getElementById("a3");
					var l3 = document.getElementById("l3");
					var gallery = document.getElementById("gallery");
					var home = document.getElementById("home");
					var containportfolio = document.getElementById("containportfolio");
					var active4 = document.getElementById("a4");

					var openc = document.getElementById("l3");
					var openg = document.getElementById("l2");
					var openh = document.getElementById("l1");

					openc.onclick = function() {
						contact.style.display = "block",
						active3.style.display = "block",
						gallery.style.display = "none",
						active2.style.display = "none"
						home.style.display = "none",
						active1.style.display = "none";
					}

					openg.onclick = function() {
						gallery.style.display = "block",
						active2.style.display = "block",
						active3.style.display = "none",
						contact.style.dispaly = "none",
						home.style.display = "none",
						active1.style.display = "none";
					}
					openh.onclick = function() {
						gallery.style.display = "none",
						home.style.display = "block",
						active1.style.display = "block",
						contact.style.display = "none",
						active2.style.display = "none",
						active3.style.display = "none";
					}

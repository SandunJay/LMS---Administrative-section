
//Header define
class MyHeader extends HTMLElement{
    connectedCallback() {
        this.innerHTML =`
            <header>
            <a href="adminHome.php" class="logo" >
                <img src="Img/SkillUP yellow black.png" width="100px" height="100px" alt="Academy logo"/>
            </a>
            <navbar>
                <a href="adminHome.php" class="active">Home</a>
                <a href="CourseHome.html">Courses</a>
                <a href="CourseDetails.php">lessons</a>
                <a href="PHP/contact.php">Contact</a>
                <a href="FAQ.php">FAQ</a>
                <a href="adminProfile.php">My Profile</a>
            </navbar>
            <search_bar>
                    <form class="search" >
                        <input type="text" placeholder="Search....." class="input"></input>
                    <Sbutton type="submit" class="Sbutton">
                        <i class="ri-search-2-line"></i>
                    </Sbutton>
                    </form>
            </search_bar>
            </header>
            `
    }
}


customElements.define('my-header',MyHeader)


const logo = document.querySelector(".logo");
const navbar = document.querySelector("navbar");
const search_bar=document.querySelector("search_bar");

//reveal elements on page loading
window.addEventListener("load", () => {
  logo.style.transform = "translateY(0)";
  navbar.style.transform = "translateY(0)";
  search_bar.style.transform ="translateY(0)";
});

//Footer define
class MyFooter extends HTMLElement{
    connectedCallback(){
        this.innerHTML=`
        <div class="footer">
        <div class="foo_container">
          <div class="foo_row">
            <div>
              <img src="Img/SkillUP dark.png" width="200px" height="200px">
            </div>
            <div class="footer-col">
              <h4>SkillUP</h4>
              <ul>
                <li><a href="about.php">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="privacy.php">Privacy policy</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Help</h4>
              <ul>
                <li><a href="FAQ.php">FAQ</a></li>
                <li><a href="payment.php">Payments</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Follow us on</h4>
              <div class="social-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
            </div>
          </div>
        </div>
      </div>
        `
    }
}

customElements.define('my-footer',MyFooter)
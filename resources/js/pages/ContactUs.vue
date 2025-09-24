<template>
       <section class="contact py-5">
      <div class="container-fluid px-3 px-sm-4 pb-5">
        <div class="row pt-3">
          <div class="col-12 w-100 d-md-flex justify-content-md-center">
            <div class="box">
              <div class="title d-flex flex-column align-items-center mb-3">
                <h1>CONTACT</h1>
                <img src="../assets/images/line.png" alt="" />
              </div>
              <p class="px-0 px-sm-5">
                Have a project in mind, or looking to hire a passionate
                versatile software engineer to join your team, feel free to
                reach out.
                <br />
                Let's talk! I am available for remote internships, freelance
                roles, or full-time opportunities.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center w-100">
            <div
              class="form d-flex flex-column align-items-center py-4 mt-3 w-100"
            >
              <div
                class="c-one d-flex flex-sm-row flex-column justify-content-center gap-3 gap-sm-4 mb-5 mb-sm-4"
              >
                <a
                  href="https://maps.app.goo.gl/WHQdMLXZhGUDw5MW8"
                  class="d-flex justify-content-sm-center align-items-center"
                  ><i class="fa-solid fa-location-dot"></i> &nbsp; Rawalpindi</a
                >
                <a
                  href="mailto:nicerweb@gmail.com"
                  class="d-flex justify-content-sm-center align-items-center"
                  ><i class="fa-solid fa-envelope"></i> &nbsp;
                  nicerweb@gmail.com</a
                >
                <a
                  href="tel:+923404556573"
                  class="d-flex justify-content-sm-center align-items-center"
                  ><i class="fa-solid fa-phone"></i> &nbsp; 03404556573</a
                >
              </div>

              <form
                action="https://formspree.io/f/mrgnwngl"
                method="POST"
                class="d-flex flex-column gap-4 align-items-center"
              >
                <div class="f-one d-flex flex-sm-row flex-column gap-3 w-100">
                  <div id="one" class="w-100">
                    <label for="">Your Name</label><br /><input
                      class="ps-3 w-100"
                      type="text"
                      placeholder="E.g. Ata Ur Rehman"
                      name="UserName"
                    />
                  </div>
                  <div id="two" class="w-100">
                    <label for="">Email</label><br /><input
                      class="ps-3 w-100"
                      type="email"
                      placeholder="E.g. info@gmail.com"
                      name="Email"
                      required
                    />
                  </div>
                </div>
                <div class="f-one d-flex flex-sm-row flex-column gap-3 w-100">
                  <div id="one" class="w-100">
                    <label for="">Phone Number</label><br /><input
                      class="ps-3 w-100"
                      type="tel"
                      placeholder="E.g. +923404556573"
                      name="Phone Number"
                      required
                    />
                  </div>
                  <div id="two" class="w-100">
                    <label for="">Subject</label><br /><input
                      class="ps-3 w-100"
                      type="text"
                      placeholder="E.g. Project Name"
                    />
                  </div>
                </div>
                <div id="four" class="w-100">
                  <label for="">Message</label><br /><textarea
                    class="ps-3 w-100"
                    cols="30"
                    rows="10"
                    name="Message"
                    placeholder="E.g. I need a help in Coding"
                    required
                  ></textarea>
                </div>
                <input type="submit" class="px-4" value="Send Message" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

</template>
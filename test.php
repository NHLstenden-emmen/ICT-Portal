<style>
/* Ripple effect */
.ripple {
  background-position: center;
  transition: background 0.8s;
}
.ripple:hover {
  background: #47a7f5 radial-gradient(circle, transparent 1%, #47a7f5 1%) center/15000%;
}
.ripple:active {
  background-color: #6eb9f7;
  background-size: 100%;
  transition: background 0s;
}

/* Button style */
a {
  border: none;
  border-radius: 2px;
  padding: 12px 18px;
  font-size: 16px;
  text-transform: uppercase;
  cursor: pointer;
  color: white;
  box-shadow: 0 0 4px #999;
  outline: none;
}

</style>
<button class="ripple">Button</button>
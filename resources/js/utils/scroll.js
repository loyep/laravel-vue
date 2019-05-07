function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
    (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <=
    (window.innerWidth || document.documentElement.clientWidth)
  );
};

function givenElementInViewport(el, fn) {
  return function () {
    if (isElementInViewport(el)) {
      fn.call();
    }
  };
}

export function addViewportEvent(el, fn) {
  if (window.addEventListener) {
    addEventListener(
      'DOMContentLoaded',
      givenElementInViewport(el, fn),
      false,
    );
    addEventListener('load', givenElementInViewport(el, fn), false);
    addEventListener('scroll', givenElementInViewport(el, fn), false);
    addEventListener('resize', givenElementInViewport(el, fn), false);
  } else if (window.attachEvent) {
    attachEvent('DOMContentLoaded', givenElementInViewport(el, fn));
    attachEvent('load', givenElementInViewport(el, fn));
    attachEvent('scroll', givenElementInViewport(el, fn));
    attachEvent('resize', givenElementInViewport(el, fn));
  }
}


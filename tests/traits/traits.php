<?php
trait A {
  function testFunction() { /*1*/ }
  function otherTestFunction() { /*2*/ }
}

trait B {
  function someOtherTestFunction() { /*3*/ }
}

trait C {
  function someOtherTestFunction() { /*4*/ }
  function testFunction() { /*5*/ }
}

class ImplementingClass {
    use testTrait, otherTrait;
    use testTrait, implementingTrait {
      A::testFunction insteadof C;
      B::someOtherTestFunction as aliasedFunctionName;
      C::testFunction as private testVisibility;
    }
}

class ShortImplementingClass {
  use testTrait { A::testFunction insteadof C; }
}

class Partial {
    use AbstractTrait {
        deleteItems as private;
        AbstractTrait::deleteItem as delete;
        AbstractTrait::hasItem as has;
    }
}

trait emptyTrait {}

trait EmptyTraitWithComment { /* Comment */ }

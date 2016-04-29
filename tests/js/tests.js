QUnit.test("basic test", function( assert ) {
    assert.equal(1, 1, '1 === 1');
});

QUnit.test("failing test", function( assert ) {
    assert.equal(1, 0, '1 === 0');
});
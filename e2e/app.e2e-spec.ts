import { RecetarioPage } from './app.po';

describe('recetario App', function() {
  let page: RecetarioPage;

  beforeEach(() => {
    page = new RecetarioPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});

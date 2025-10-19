const menuSections = {
    cheesecakeSeries: {
        title: 'CHEESECAKE SERIES',
        items: [
            { name: 'Strawberry Cheesecake', price: 'S. ₱79 | M. ₱89 | L. ₱99', description: 'Creamy cheesecake with fresh strawberries and a graham crust.', image: 'menu_assets/strawberry_cheesecake.png' },
            { name: 'Matcha Cheesecake', price: 'S. ₱79 | M. ₱89 | L. ₱99', description: 'Rich cheesecake infused with earthy matcha green tea.', image: 'menu_assets/matcha_cheesecake.png' },
            { name: 'Chocolate Cheesecake', price: 'S. ₱79 | M. ₱89 | L. ₱99', description: 'Decadent cheesecake with smooth, indulgent chocolate.', image: 'menu_assets/chocolate_cheesecake.png' },
            { name: 'Blueberry Cheesecake', price: 'S. ₱79 | M. ₱89 | L. ₱99', description: 'Classic cheesecake topped with sweet blueberry compote.', image: 'menu_assets/blueberry_cheesecake.png' },
            { name: 'Oreo Cheesecake', price: 'S. ₱79 | M. ₱89 | L. ₱99', description: 'Creamy cheesecake blended with crunchy Oreo cookies.', image: 'menu_assets/oreo_cheesecake.png' }
        ]
    },
    premium: {
        title: 'PREMIUM CREPES',
        items: [
            { name: 'Milky White Graham', price: '₱75', description: 'A creamy crepe filled with white chocolate and graham crackers.', image: 'menu_assets/milky_white_graham.png' },
            { name: 'Milky Matcha Graham', price: '₱75', description: 'A blend of matcha, chocolate, and graham in a premium crepe.', image: 'menu_assets/milky_matcha_graham.png' },
            { 
                name: 'Nutella Smores', 
                price: '₱50', 
                description: 'A gooey crepe with Nutella, marshmallows, and graham crackers.',
                image: 'menu_assets/nutella_smores.png'
            },
            { 
                name: 'Nutella Oreo', 
                price: '₱80', 
                description: 'A decadent crepe with Nutella and crushed Oreo cookies.',
                image: 'menu_assets/nutella_oreo.png'
            },
            { 
                name: 'Strawberry Whipped', 
                price: '₱95', 
                description: 'Crepe topped with strawberries, graham, whipped cream, and Hershey’s Kisses.',
                image: 'menu_assets/strawberry_whipped.png'
            },
            { 
                name: 'Blueberry Whipped', 
                price: '₱95', 
                description: 'Crepe topped with blueberries, graham, whipped cream, and Hershey’s Kisses.',
                image: 'menu_assets/blueberry_whipped.png'
            },
            { 
                name: 'Crunchy Biscoff', 
                price: '₱95', 
                description: 'Crepe with Biscoff cookies and whipped cream for a rich flavor.',
                image: 'menu_assets/crunchy_biscoff.png'
            },
            { 
                name: 'Mango Loco', 
                price: '₱100', 
                description: 'Crepe topped with mango, Nutella, whipped cream, and Hershey’s Kisses.',
                image: 'menu_assets/mango_loco.png'
            }
        ]
    },
    savory: {
        title: 'SAVORY CREPES',
        items: [
            { name: 'Cheese Egg', price: '₱85', description: 'Savory crepe with cheese, egg, mayo, pepper, and lettuce.', image: 'menu_assets/cheese_egg.png' },
            { name: 'Ham and Cheese', price: '₱85', description: 'Savory crepe with ham, cheese, mayo, pepper, and lettuce.', image: 'menu_assets/ham_and_cheese.png' },
            { 
                name: 'Tuna Mayo', 
                price: '₱85', 
                description: 'Savory crepe with tuna, mayo, pepper, and lettuce.',
                image: 'menu_assets/tuna_mayo.png'
            },
            { 
                name: 'Beefyfield', 
                price: '₱95', 
                description: 'Savory crepe with beef, cheese, mayo, pepper, and lettuce.',
                image: 'menu_assets/beefyfield.png'
            },
            { 
                name: 'Hamcon', 
                price: '₱100', 
                description: 'Savory crepe with ham, bacon, cheese, mayo, pepper, and lettuce.',
                image: 'menu_assets/hamcon.png'
            },
            { 
                name: 'Baconize', 
                price: '₱95', 
                description: 'Savory crepe with bacon, cheese, mayo, pepper, and lettuce.',
                image: 'menu_assets/baconize.png'
            },
                    { 
                        name: 'Chaos', 
                        price: '₱145', 
                        description: 'Hearty crepe with ham, bacon, beef, cheese, mayo, pepper, and lettuce.' ,
                        img: 'menu_assets/chaos'
                    }
        ]
    },
    frappeSeries: {
        title: 'FRAPPE SERIES',
        items: [
            { 
                name: 'Strawberry Frappe', 
                price: 'S. ₱89 | M. ₱99 | L. ₱109', 
                description: 'Chilled blend of strawberries, milk, and ice.',
                image: 'menu_assets/strawberry_frappe.png'
            },
            { 
                name: 'Matcha Frappe', 
                price: 'S. ₱89 | M. ₱99 | L. ₱109', 
                description: 'Refreshing blend of matcha, milk, and ice.',
                image: 'menu_assets/matcha_frappe.png'
            },
            { 
                name: 'Chocolate Frappe', 
                price: 'S. ₱89 | M. ₱99 | L. ₱109', 
                description: 'Cold, creamy blend of chocolate, milk, and ice.',
                image: 'menu_assets/chocolate_frappe.png'
            },
            { 
                name: 'Blueberry Frappe', 
                price: 'S. ₱89 | M. ₱99 | L. ₱109', 
                description: 'Sweet blend of blueberries, milk, and ice.',
                image: 'menu_assets/blueberry_frappe.png'
            },
            { 
                name: 'Oreo Frappe', 
                price: 'S. ₱89 | M. ₱99 | L. ₱109', 
                description: 'Creamy blend of Oreos, milk, and ice.',
                image: 'menu_assets/oreo_frappe.png'
            }
        ],
    },
    icedCoffeeSeries: {
        title: 'ICED COFFEE SERIES',
        items: [
            { 
                name: 'Caramel Macchiato', 
                price: 'M. ₱109 | L. ₱119', 
                description: 'Espresso with caramel sweetness and smooth milk.',
                image: 'menu_assets/caramel_macchiato.png'
            },
            { 
                name: 'Spanish Latte', 
                price: 'M. ₱109 | L. ₱119', 
                description: 'Espresso, steamed milk, and sweetened condensed milk.',
                image: 'menu_assets/spanish_latte.png'
            },
            { 
                name: 'Salted Caramel', 
                price: 'M. ₱109 | L. ₱119', 
                description: 'Sweet and salty caramel flavor with a touch of sea salt.',
                image: 'menu_assets/salted_caramel.png'
            },
            { 
                name: 'Matcha Espresso', 
                price: 'M. ₱109 | L. ₱119', 
                description: 'Earthy matcha and bold espresso in one drink.',
                image: 'menu_assets/matcha_espresso.png'
            },
            { 
                name: 'White Chocolate Mocha', 
                price: 'M. ₱109 | L. ₱119', 
                description: 'Rich white chocolate and espresso with steamed milk.',
                image: 'menu_assets/white_chocolate_mocha.png'
            }
        ],
    },
    fruitTeaFusionSeries: {
        title: 'FRUIT TEA FUSION SERIES',
        items: [
            { 
                name: 'Strawberry', 
                price: 'M. ₱59 | L. ₱69', 
                description: 'Passion fruit and sweet strawberries in a refreshing iced tea.',
                image: 'menu_assets/strawberry_fruit_tea_fusion.png'
            },
            { 
                name: 'Kiwi', 
                price: 'M. ₱59 | L. ₱69', 
                description: 'Tropical passion fruit with sweet, tart kiwi in iced tea.',
                image: 'menu_assets/kiwi_fruit_tea.png'
            },
            { 
                name: 'Blueberry', 
                price: 'M. ₱59 | L. ₱69', 
                description: 'Sweet blueberries blended with tangy passion fruit in iced tea.',
                image: 'menu_assets/blueberry_fruit_tea.png'
            },
            { 
                name: 'Green Apple', 
                price: 'M. ₱59 | L. ₱69', 
                description: 'Crisp green apples and tropical passion fruit in iced tea.',
                image: 'menu_assets/green_apple_fruit_tea.png'
            },
            { 
                name: 'Lychee', 
                price: 'M. ₱59 | L. ₱69', 
                description: 'Sweet lychee and exotic passion fruit in a refreshing iced tea.',
                image: 'menu_assets/lychee_fruit_tea.png'
            }
        ],
    },
    milkyLatteSeries: {
        title: 'MILKY LATTE SERIES',
        items: [
            { 
                name: 'Strawberry Milk', 
                price: 'M. ₱89 | L. ₱99', 
                description: 'Smooth strawberry milk latte with espresso and steamed milk.',
                image: 'menu_assets/strawberry_milk_latte.png'
            },
            { 
                name: 'Matcha Latte', 
                price: 'M. ₱89 | L. ₱99', 
                description: 'Earthy matcha and milk for a calming, smooth latte.',
                image: 'menu_assets/matcha_latte.png'
            },
            { 
                name: 'Mango Latte', 
                price: 'M. ₱89 | L. ₱99', 
                description: 'Tropical mango puree with espresso and steamed milk.',
                image: 'menu_assets/mango_latte.png'
            },
            { 
                name: 'Blueberry Milk', 
                price: 'M. ₱89 | L. ₱99', 
                description: 'Sweet blueberry milk latte with a creamy finish.',
                image: 'menu_assets/blueberry_milk_latte.png'
            },
            { 
                name: 'Oreo Latte', 
                price: 'M. ₱89 | L. ₱99', 
                description: 'Rich espresso latte with crushed Oreo cookies and steamed milk.',
                image: 'menu_assets/oreo_latte.png'
            }
        ],
    },
    snacks: {
        title: 'SNACKS',
        items: [
            { 
                name: 'Nachos', 
                price: 'Solo ₱80 | Sharing ₱150', 
                description: 'Mexican-inspired tortilla chips with various toppings.',
                image: 'menu_assets/nachos.png'
            },
            { 
                name: 'French Fries', 
                price: 'Solo ₱60 | Sharing ₱110', 
                description: 'Golden, crispy potato fries with a satisfying crunch.',
                image: 'menu_assets/french_fries.png'
            },
            { 
                name: 'Chicken and Fries', 
                price: '₱130', 
                description: 'Crispy chicken served with delicious fries.',
                image: 'menu_assets/chicken_and_fries.png'
            },
            { 
                name: 'Cheesy Beefy Fries', 
                price: '₱145', 
                description: 'Crispy fries topped with cheese and savory beef.',
                image: 'menu_assets/cheesy_beefy_fries.png'
            },
            { 
                name: 'Homemade Cheese Stick', 
                price: '₱45', 
                description: 'Cheese wrapped in a crunchy, golden crust.',
                image: 'menu_assets/homemade_cheese_stick.png'
            }
        ]
    },

    riceMeals: {
        title: 'RICE MEALS',
        items: [
            { 
                name: 'Toriyaki', 
                price: '₱90', 
                description: 'Tender chicken cooked in a sweet and savory soy-based sauce.',
                image: 'menu_assets/toriyaki.png'
            },
            { 
                name: 'ToriKatsu', 
                price: '₱90', 
                description: 'Tender chicken sautéed with onions, served with rice.',
                image: 'menu_assets/torikatsu.png'
            },
            { 
                name: 'Hammy Egg', 
                price: '₱80', 
                description: 'Ham and egg served with rice, perfect for breakfast.',
                image: 'menu_assets/hammy_egg.png'
            },
            { 
                name: 'Bulgogi', 
                price: '₱90', 
                description: 'Korean-style thinly sliced beef marinated in a sweet and savory sauce.',
                image: 'menu_assets/bulgogi.png'
            },
            { 
                name: 'Chicken Fingers', 
                price: '₱75', 
                description: 'Crispy, breaded strips of chicken breast. Flavors: Cheesy Finger, Korean Style, Buffalo, Honey Glazed.',
                image: 'menu_assets/chicken_fingers.png'
            },
            { 
                name: 'Hottylog', 
                price: '₱65', 
                description: 'Juicy hotdog and egg served with rice.',
                image: 'menu_assets/hottylog.png'
            },
            { 
                name: 'Spamsilog', 
                price: '₱80', 
                description: 'Fried Spam and egg served with rice.',
                image: 'menu_assets/spamsilog.png'
            }
        ]
    },
    crepes: {
        title: 'CLASSIC CREPES',
        items: [
            { 
                name: 'Plain Crepe', 
                price: '₱50', 
                description: 'Versatile crepe that pairs perfectly with savory or sweet toppings.',
                image: 'menu_assets/plain_crepe.png'
            },
            { 
                name: 'Choco Baby', 
                price: '₱65', 
                description: 'A classic crepe filled with rich and creamy chocolate.',
                image: 'menu_assets/choco_baby.png'
            },
            { 
                name: 'Milly Baby', 
                price: '₱65', 
                description: 'A soft crepe layered with creamy, milk-based filling.',
                image: 'menu_assets/milly_baby.png'
            },
            { 
                name: 'Matcha Baby', 
                price: '₱65', 
                description: 'A crepe infused with matcha for a subtle earthy flavor.',
                image: 'menu_assets/matcha_baby.png'
            }
        ]
    },
};

let currentSection = 'cheesecakeSeries';

function changeSectionDropdown() {
    const dropdown = document.getElementById('sectionDropdown');
    currentSection = dropdown.value;
    updateSection();
}

function updateSection() {
    const sectionData = menuSections[currentSection];
    const menuItemsContainer = document.getElementById('menuItems');

    const dropdown = document.getElementById('sectionDropdown');
    dropdown.value = currentSection;

    menuItemsContainer.innerHTML = '';
    sectionData.items.forEach((item, index) => {
        const menuItem = document.createElement('div');
        menuItem.className = 'item';
        menuItem.textContent = item.name;
        menuItem.onclick = () => changeItem(index);
        menuItemsContainer.appendChild(menuItem);
    });

    changeItem(0);
}

function changeItem(index) {
    const sectionData = menuSections[currentSection];
    const selectedItem = sectionData.items[index];
    document.getElementById('itemImage').src = selectedItem.image;
    document.getElementById('itemName').textContent = selectedItem.name;
    document.getElementById('itemPrice').textContent = selectedItem.price;
    document.getElementById('itemDescription').textContent = selectedItem.description;
}

function initializeDropdown() {
    const dropdown = document.getElementById('sectionDropdown');
    Object.keys(menuSections).forEach(section => {
        const option = document.createElement('option');
        option.value = section;
        option.textContent = menuSections[section].title;
        dropdown.appendChild(option);
    });
}

initializeDropdown();
updateSection();
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.tree import DecisionTreeClassifier
import pickle

# load the dataset
df = pd.read_csv("newdataset.csv")

# split the dataset into training and testing sets
X = df.drop('target_variable', axis=1)
y = df['target_variable']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# train the model
model = DecisionTreeClassifier()
model.fit(X_train, y_train)

# save the model as a file
with open("train.pkl", "wb") as f:
    pickle.dump(model, f)
// load the saved model
$model = null;
$filename = "your_model.pkl";
if (file_exists($filename)) {
    $model = file_get_contents($filename);
    $model = unserialize($model);
}

// make predictions using the model
if ($model !== null) {
    $input_data = array(1.0, 2.0, 3.0, 4.0); // modify this to match your input data
    $predicted_class = $model->predict([ $input_data ]);
    echo "Predicted class: " . $predicted_class[0];
} else {
    echo "Failed to load model";
}